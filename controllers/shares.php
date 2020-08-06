<?php

class Shares extends Controller{
	protected function Index(){
		$viewmodel = new ShareModel();
		$this->returnView($viewmodel->Index(), true);
	}

	protected function add(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: ' . ROOT_PATH . 'shares');
		} else {
			$viewmodel = new ShareModel();
			$this->returnView($viewmodel->add(), true);
		}
	}

	protected function edit(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: ' . ROOT_PATH . 'shares');
		} else {
			$viewmodel = new ShareModel();
			$this->returnView($viewmodel->edit(), true);
		}
	}

	protected function delete(){
		if(!isset($_SESSION['is_logged_in'])){
			header('Location: ' . ROOT_PATH . 'shares');
		} else {
			$viewmodel = new ShareModel();
			$this->returnView($viewmodel->delete(), true);
		}
	}
}

?>