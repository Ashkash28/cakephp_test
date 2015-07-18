<?php

App::uses('AppController', 'Controller');

class PostsController extends AppController {
	public $helpers = array("Html", "Form");

	public function index() {
// set() passes data from the controller to the view
		$this->set("posts", $this->Post->find("all"));
	}

	public function view($id = null) {
//checks to see if a following parameter is after /view/
	       if (!$id) {
	           throw new NotFoundException(__('Invalid post'));
	       }

	       $post = $this->Post->findById($id);
//checks to see if id is present in the db
	       if (!$post) {
	           throw new NotFoundException(__('Invalid post'));
	       }
//passes post data to view.ctp
	       $this->set('post', $post);
	   }

	public function add() {
	        if ($this->request->is('post')) {
	            $this->Post->create();
	            if ($this->Post->save($this->request->data)) {
	                $this->Session->setFlash(__('Your post has been saved.'));
	                return $this->redirect(array('action' => 'index'));
	            }
	            $this->Session->setFlash(__('Unable to add your post.'));
	        }
	    }

	public function edit($id = null) {
//checks to see if a following parameter is after /view/
	    if (!$id) {
	        throw new NotFoundException(__('Invalid post'));
	    }
//checks to see if post with the post id is in db
	    $post = $this->Post->findById($id);
	    if (!$post) {
	        throw new NotFoundException(__('Invalid post'));
	    }

//updates put data to db and redirects user to index page
	    if ($this->request->is(array('post', 'put'))) {
	        $this->Post->id = $id;
	        if ($this->Post->save($this->request->data)) {
	            $this->Session->setFlash(__('Your post has been updated.'));
	            return $this->redirect(array('action' => 'index'));
	        }
	        $this->Session->setFlash(__('Unable to update your post.'));
	    }

	    if (!$this->request->data) {
	        $this->request->data = $post;
	    }
	}

	public function delete($id) {
//makes sure that delete is a post method
	    if ($this->request->is('get')) {
	        throw new MethodNotAllowedException();
	    }

	    if ($this->Post->delete($id)) {
	        $this->Session->setFlash(
	            __('The post with id: %s has been deleted.', h($id))
	        );
	    } else {
	        $this->Session->setFlash(
	            __('The post with id: %s could not be deleted.', h($id))
	        );
	    }

	    return $this->redirect(array('action' => 'index'));
	}
} 