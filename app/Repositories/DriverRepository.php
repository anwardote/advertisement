<?php

namespace App\Repositories;

/**
 * Class ContentRepository
 *
 * @author Sahbaj Uddin
 */
use App\Http\Models\Driver;
use Config,
    Event;

class DriverRepository {

    /**
     * Sentry instance
     * @var
     */
    public function __construct() {
        
    }

    /**
     * Create a new object
     *
     * @return mixed
     * @override
     */
    public function create(array $input) {

        try {
            $driver = new Driver();
            $driver->create($input);
        } catch (CartaUserExists $e) {
            throw new NotFoundException;
        }
        return $driver;
    }

    /**
     * Update a new object
     *
     * @param       id
     * @param array $data
     * @return mixed
     */
    public function update($id, array $data) {
        $obj = $this->find($id);
        //  Event::fire('repository.updating', [$obj]);
        $obj->update($data);
        return $obj;
    }

    /**
     * Obtains all models
     *
     * @override
     * @param array $search_filters
     * @return mixed
     */
    public function all(array $search_filters = []) {

        $q = new Driver();
        $per_page = Config::get('acl_base.list_per_page');
       // $q = $this->applySearchFilters($search_filters, $q);
        return $q->paginate($per_page);
    }

    public function allUser(array $search_filters = [], $user_id) {

        $q = new Driver();
        $per_page = Config::get('acl_base.list_per_page');
        // $q = $this->applySearchFilters($search_filters, $q);
        return $q->where('user_id', $user_id)->paginate($per_page);
    }

    /**
     * @param array $search_filters
     * @param       $q
     * @return mixed
     */
    protected function applySearchFilters(array $search_filters, $q) {
        if (isset($search_filters['name']) && $search_filters['name'] !== '')
            $q = $q->where('name', 'LIKE', "%{$search_filters['name']}%");
        return $q;
    }

    /**
     * Deletes a new object
     *
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        $obj = $this->find($id);
        //   Event::fire('repository.deleting', [$obj]);
        return $obj->delete();
    }

    /**
     * Find a model by his id
     *
     * @param $id
     * @return mixed
     * @throws \LaravelAcl\Authentication\Exceptions\UserNotFoundException
     */
    public function find($id) {
        try {
            $driver = Driver::find($id);
        } catch (GroupNotFoundException $e) {
            throw new NotFoundException;
        }

        return $driver;
    }

    /*CMS View*/

    public function allWhere(array $search_filters = [], $request)
    {

        $q = new Driver();
        $per_page = Config::get('acl_base.list_per_page');
        // $q = $this->applySearchFilters($search_filters, $q);
        return $q->where([['view_category_id', $request->view_category_id], ['status', 'PUBLISHED']])
            ->orderBy('created_at', 'desc')
            ->paginate($per_page);

    }
    

}
