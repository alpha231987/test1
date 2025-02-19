<?php

namespace App\Controllers;

use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\RESTful\ResourceController;

class Project extends ResourceController
{
    /**
     * Return an array of resource objects, themselves in array format.
     *
     * @return ResponseInterface
     */
    //protected $format    = 'json';
    public function index()
    {
        $dummyarray = [
            [
                'id' => 1,
                'name' => 'project1',
                'description' => 'project1 description',
                'status' => 'active',
                'created_at' => '2021-01-01',
                'updated_at' => '2021-01-01',
            ],
            [
                'id' => 2,
                'name' => 'project2',
                'description' => 'project2 description',
                'status' => 'active',
                'created_at' => '2021-01-02',
                'updated_at' => '2021-01-02',
            ],
        ];
        return $this->respond($dummyarray, 200);

    }
    public function test2()
    {
        $url = "https://raw.githubusercontent.com/bvaughn/infinite-list-reflow-examples/refs/heads/master/books.json";
        $jsonData = file_get_contents($url);
        echo "<pre>";print_r($jsonData);die;

        echo "dfsd";die;

    }

    /**
     * Return a single resource object, in array format.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
     
    /**
     * Return the properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function show($id = null)
    {
        //
    }

    /**
     * Return a new resource object, with default properties.
     *
     * @return ResponseInterface
     */
    public function new()
    {
        //
    }

    /**
     * Create a new resource object, from "posted" parameters.
     *
     * @return ResponseInterface
     */
    public function create()
    {
        //
    }

    /**
     * Return the editable properties of a resource object.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function edit($id = null)
    {
        //
    }

    /**
     * Add or update a model resource, from "posted" properties.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function update($id = null)
    {
        //
    }

    /**
     * Delete the designated resource object from the model.
     *
     * @param int|string|null $id
     *
     * @return ResponseInterface
     */
    public function delete($id = null)
    {
        //
    }
}
