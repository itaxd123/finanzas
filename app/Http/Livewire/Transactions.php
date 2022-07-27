<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Transaction;

class Transactions extends Component
{
    use WithPagination;

	protected $paginationTheme = 'bootstrap';
    public $selected_id, $keyWord, $description, $total, $id_user, $id_type_transaction, $id_type_currency;
    public $updateMode = false;

    public function render()
    {
		$keyWord = '%'.$this->keyWord .'%';
        return view('livewire.transactions.view', [
            'transactions' => Transaction::latest()
						->orWhere('description', 'LIKE', $keyWord)
						->orWhere('total', 'LIKE', $keyWord)
						->orWhere('id_user', 'LIKE', $keyWord)
						->orWhere('id_type_transaction', 'LIKE', $keyWord)
						->orWhere('id_type_currency', 'LIKE', $keyWord)
						->paginate(10),
        ]);
    }
	
    public function cancel()
    {
        $this->resetInput();
        $this->updateMode = false;
    }
	
    private function resetInput()
    {		
		$this->description = null;
		$this->total = null;
		$this->id_user = null;
		$this->id_type_transaction = null;
		$this->id_type_currency = null;
    }

    public function store()
    {
        $this->validate([
		'description' => 'required',
		'total' => 'required',
		'id_user' => 'required',
		'id_type_transaction' => 'required',
		'id_type_currency' => 'required',
        ]);

        Transaction::create([ 
			'description' => $this-> description,
			'total' => $this-> total,
			'id_user' => $this-> id_user,
			'id_type_transaction' => $this-> id_type_transaction,
			'id_type_currency' => $this-> id_type_currency
        ]);
        
        $this->resetInput();
		$this->emit('closeModal');
		session()->flash('message', 'Transaction Successfully created.');
    }

    public function edit($id)
    {
        $record = Transaction::findOrFail($id);

        $this->selected_id = $id; 
		$this->description = $record-> description;
		$this->total = $record-> total;
		$this->id_user = $record-> id_user;
		$this->id_type_transaction = $record-> id_type_transaction;
		$this->id_type_currency = $record-> id_type_currency;
		
        $this->updateMode = true;
    }

    public function update()
    {
        $this->validate([
		'description' => 'required',
		'total' => 'required',
		'id_user' => 'required',
		'id_type_transaction' => 'required',
		'id_type_currency' => 'required',
        ]);

        if ($this->selected_id) {
			$record = Transaction::find($this->selected_id);
            $record->update([ 
			'description' => $this-> description,
			'total' => $this-> total,
			'id_user' => $this-> id_user,
			'id_type_transaction' => $this-> id_type_transaction,
			'id_type_currency' => $this-> id_type_currency
            ]);

            $this->resetInput();
            $this->updateMode = false;
			session()->flash('message', 'Transaction Successfully updated.');
        }
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Transaction::where('id', $id);
            $record->delete();
        }
    }
}
