<?php
namespace SimpleWebGit\Controller;

use \App\MyApp;
use Symfony\Component\HttpFoundation\Request;

class TreeListController {

    public function index(Request $req, MyApp $app) {
        // show the list of files in / of cwr
        $data = [];
        $data['name'] = 'Foozzy Goose';
        return $app->renderView('TreeList/index.html.twig', $data);
    }

    public function edit($id) {
        // show edit form
    }

    public function show($id) {
        // show the user #id
    }

    public function store() {
        // create a new user, using POST method
    }

    public function update($id) {
        // update the user #id, using PUT method
    }

    public function destroy($id) {
        // delete the user #id, using DELETE method
    }
}
