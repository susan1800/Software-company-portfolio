<?php

namespace App\Repositories;

use App\About;
use App\Contact;
use App\Contracts\AboutContract;
use App\Contracts\ContactContract;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Doctrine\Instantiator\Exception\InvalidArgumentException;

/**
 * Class AboutRepository
 *
 * @package \App\Repositories
 */
class ContactRepository extends BaseRepository implements ContactContract
{


    /**
     * @param string $order
     * @param string $sort
     * @param array $columns
     * @return mixed
     */

    /**
     * AboutRepository constructor.
     * @param About $model
     */
    public function __construct(Contact $model)
    {
        parent::__construct($model);
        $this->model = $model;
    }


    public function listContact(string $order = 'id', string $sort = 'desc', array $columns = ['*'])
    {
        return $this->all($columns, $order, $sort);
    }

    /**
     * @param int $id
     * @return mixed
     */
    public function findContactById(int $id)
    {
        try {
            return $this->findOneOrFail($id);

        } catch (ModelNotFoundException $e) {

            throw new ModelNotFoundException($e);
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function createContact(array $params)
    {
        try {
            $collection = collect($params);
            $contact = new Contact();
            $contact['title']=$collection['title'];
            $contact['details'] =$collection['details'];
            $contact['email']=$collection['email'];
            $contact['phone'] =$collection['phone'];
            $contact['location']=$collection['location'];
            $contact['lat']=$collection['lat'];
            $contact['long']=$collection['long'];
            $contact['status']=$collection['status'];

            $contact->save();

            return $contact;

        } catch (QueryException $exception) {
            throw new InvalidArgumentException($exception->getMessage());
        }
    }

    /**
     * @param array $params
     * @return mixed
     */
    public function updateContact(array $params)
    {
        $contact = $this->findContactById($params['id']);

        $collection = collect($params)->except('_token');

        if ($collection->has('image') && ($params['image'] instanceof  UploadedFile)) {

            if ($contact->image != null) {
                $this->deleteOne($contact->image);
            }

            $image = $this->uploadOne($params['image'], 'contact');
            $collection['image'] = $image;
        }
        else{
            $collection['image'] =$contact->image;
        }
        $contact['title']=$collection['title'];
            $contact['details'] =$collection['details'];
        $contact['email']=$collection['email'];
        $contact['phone']=$collection['phone'];
        $contact['location']=$collection['location'];
        $contact['lat']=$collection['lat'];
        $contact['long']=$collection['long'];
        $contact->update();

        return $contact;
    }

    /**
     * @param $id
     * @return bool
     */
    public function deleteContact($id)
    {
        $contact = $this->findContactById($id);

        if($contact->status == '0'){
            $contact['status']='1';
        }else{
            $contact['status']='0';
        }
        $contact->save();

        return $contact;
    }
}
