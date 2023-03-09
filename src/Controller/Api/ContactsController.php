<?php
namespace App\Controller\Api;

use App\Controller\AppController;

/**
 * Contacts Controller
 *
 *
 * @method \App\Model\Entity\User[]|\Cake\Datasource\ResultSetInterface paginate($object = null, array $settings = [])
 */
class ContactsController extends AppController
{


	public function initialize()
	{
		parent::initialize();
	}
	
    /**
     * Index method (This fuction is using to get the list of contacts)
     *
     * @return \Cake\Http\Response|null
     */
    public function index()
    {
		$this->request->allowMethod(['get']);
		$this->paginate = [
			'Contacts' => [
				'fields'=>['id','first_name','last_name','phone_number'],
				'limit' => 100,
				'order' => [
					'id' => 'desc',
				],
			]
		];
		$contacts = $this->paginate($this->Contacts);
        $this->set([
			'success'=>true,
            'contacts' => $contacts,
            '_serialize' => ['success','contacts']
        ]);
    }
	
	/**
     * Index_Ext method (This fuction is using to get the list of contacts with companies)
     *
     * @return \Cake\Http\Response|null
     */
    public function index_ext()
    {
		$this->request->allowMethod(['get']);
		$this->paginate = [
			'contain'=>['Companies'=>['fields'=>['id','company_name','address']]],
			'fields'=>['id','first_name','last_name','phone_number'],
			'limit' => 100,
			'order' => [
				'id' => 'desc',
			]
		];
		$contacts = $this->paginate($this->Contacts);
        $this->set([
			'success'=>true,
            'contacts' => $contacts,
            '_serialize' => ['success','contacts']
        ]);
		
    }
   
    /**
     * Add method(This funtion is using to add contact)
     *
     * @return \Cake\Http\Response|null Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $this->request->allowMethod(['post']);
        $contact = $this->Contacts->newEntity($this->request->getData());
		
		if($contact->errors()) {
			$this->set([
				'errors' => $contact->errors(), 
				'success' => false,
				'_serialize' => ['success','errors']]);
			return;
		}
		
        if ($this->Contacts->save($contact)) {
            $success = true;
        } else {
            $message = false;
        }
        $this->set([
            'success' => $success,
            'contact' => $contact,
			
            '_serialize' => ['success', 'contact']
        ]); 
    }
   
}
