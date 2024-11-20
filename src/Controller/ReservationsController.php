<?php
declare(strict_types=1);

namespace App\Controller;

/**
 * Reservations Controller
 *
 * @property \App\Model\Table\ReservationsTable $Reservations
 */
class ReservationsController extends AppController
{
    /**
     * Index method
     *
     * @return \Cake\Http\Response|null|void Renders view
     */public function index()
{
    // Récupérer l'utilisateur connecté via CakeDC Users
    $userId = $this->request->getAttribute('identity')->get('id');

    // Configurer la pagination et récupérer les réservations
    $query = $this->Reservations->find()
        ->where(['user_id' => $userId])
        ->contain(['Packages'])
        ->orderBy(['created' => 'DESC']);

    $reservations = $this->paginate($query);

    $this->set(compact('reservations'));
}

    /**
     * View method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null|void Renders view
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function view($id = null)
    {
        $reservation = $this->Reservations->get($id, contain: ['Types', 'Packages', 'Users']);
        $this->set(compact('reservation'));
    }

    /**
     * Add method
     *
     * @return \Cake\Http\Response|null|void Redirects on successful add, renders view otherwise.
     */
    public function add()
    {
        $reservation = $this->Reservations->newEmptyEntity();
        if ($this->request->is('post')) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $types = $this->Reservations->Types->find('list', limit: 200)->all();
        $packages = $this->Reservations->Packages->find('list', limit: 200)->all();
        $users = $this->Reservations->Users->find('list', limit: 200)->all();
        $this->set(compact('reservation', 'types', 'packages', 'users'));
    }

    /**
     * Edit method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null|void Redirects on successful edit, renders view otherwise.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function edit($id = null)
    {
        $reservation = $this->Reservations->get($id, contain: []);
        if ($this->request->is(['patch', 'post', 'put'])) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('The reservation has been saved.'));

                return $this->redirect(['action' => 'index']);
            }
            $this->Flash->error(__('The reservation could not be saved. Please, try again.'));
        }
        $types = $this->Reservations->Types->find('list', limit: 200)->all();
        $packages = $this->Reservations->Packages->find('list', limit: 200)->all();
        $users = $this->Reservations->Users->find('list', limit: 200)->all();
        $this->set(compact('reservation', 'types', 'packages', 'users'));
    }

    /**
     * Delete method
     *
     * @param string|null $id Reservation id.
     * @return \Cake\Http\Response|null Redirects to index.
     * @throws \Cake\Datasource\Exception\RecordNotFoundException When record not found.
     */
    public function delete($id = null)
    {
        $this->request->allowMethod(['post', 'delete']);
        $reservation = $this->Reservations->get($id);
        if ($this->Reservations->delete($reservation)) {
            $this->Flash->success(__('The reservation has been deleted.'));
        } else {
            $this->Flash->error(__('The reservation could not be deleted. Please, try again.'));
        }

        return $this->redirect(['action' => 'index']);
    }


    public function myReservations()
    {
        // Vérifier si l'utilisateur est connecté
        $user = $this->request->getAttribute('identity');
        if (!$user) {
            $this->Flash->error(__('Vous devez être connecté pour voir vos réservations.'));
            return $this->redirect(['plugin' => 'CakeDC/Users', 'controller' => 'Users', 'action' => 'login']);
        }
    
       
    
        // Récupérer les réservations de l'utilisateur connecté
        $reservations = $this->Reservations->find()
            ->where(['Reservations.user_id' => $user->id])
            ->contain(['Packages'])
            ->all();
    
       
        // Si aucune réservation n'est trouvée
        if ($reservations->isEmpty()) {
            $this->Flash->info(__('Aucune réservation trouvée.'));
        }
    
        $this->set(compact('reservations'));
    }
    public function reserve($packageId = null)
    {
        $reservation = $this->Reservations->newEmptyEntity();
    
        // Vérifie si l'utilisateur a soumis le formulaire
        if ($this->request->is('post')) {
            $reservation = $this->Reservations->patchEntity($reservation, $this->request->getData());
    
            // Ajouter l'ID de l'utilisateur connecté
            $userId = $this->request->getAttribute('identity')->get('id');
            $reservation->user_id = $userId;
    
            // Sauvegarder la réservation
            if ($this->Reservations->save($reservation)) {
                $this->Flash->success(__('La réservation a été enregistrée avec succès.'));
                return $this->redirect(['plugin' => null, 'controller' => 'Reservations', 'action' => 'index']);
            }
            $this->Flash->error(__('La réservation n\'a pas pu être enregistrée. Veuillez réessayer.'));
        }
    
        // Récupérer les types de forfaits
        $types = $this->Reservations->Types->find('list', ['limit' => 200])->all();
    
        // Récupérer les informations du package
        $package = $this->Reservations->Packages->get($packageId);
    
        // Envoyer les données à la vue
        $this->set(compact('reservation', 'types', 'package'));
    }
    };
