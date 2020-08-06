<?php

class ShareModel extends Model{
	public function Index(){
		$this->query('SELECT * FROM shares');
		$rows = $this->resultSet();
		return $rows;
	}

	public function add(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			if($post['title'] == '' || $post['body'] == ''){
				Messages::setMsg('Please fill in the required fields', 'error');
				return;
			}
			// Insert into mySQL
			$this->query('INSERT INTO shares (title, body, link, user_id) VALUES (:title, :body, :link, :user_id)');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':user_id', 1);
			$this->execute();

			// Verify
			if($this->lastInsertId()){
				Messages::setMsg('Post added', 'success');
				// Redirect
				header('Location: ' . ROOT_PATH . 'shares');
				exit(0);
			}
		}

		return;
	}

	public function edit(){
		// Sanitize
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			if($post['title'] == '' || $post['body'] == ''){
				Messages::setMsg('Make sure the fields are not empty', 'error');
				$this->query('SELECT * FROM shares WHERE id = :id');
				$this->bind(':id', $get['id']);
				return $this->single();
			}
			$this->query('UPDATE shares SET title = :title, body = :body, link = :link WHERE id = :id');
			$this->bind(':title', $post['title']);
			$this->bind(':body', $post['body']);
			$this->bind(':link', $post['link']);
			$this->bind(':id', $post['id']);
			$this->execute();

			Messages::setMsg('Post successfully updated', 'success');
			header('Location: '. ROOT_PATH . 'shares');
			exit(0);
		} else {
			if($get['id'] != NULL || $get['id'] != ''){
				// Fetch post using GET parameter value
				$this->query('SELECT count(*) FROM shares WHERE id = :id');
				$this->bind(':id', $get['id']);
				$row = $this->countSet();
				if($row > 0){
					$this->query('SELECT * FROM shares WHERE id = :id');
					$this->bind(':id', $get['id']);
					return $this->single();
				} else {
					header('Location: ' . ROOT_PATH . 'shares');
				}
			} else {
				header('Location: ' . ROOT_PATH . 'shares');
			}
		}
	}

	public function delete(){
		// Sanitize
		$get = filter_input_array(INPUT_GET, FILTER_SANITIZE_STRING);
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			$this->query('DELETE FROM shares WHERE id = :id');
			$this->bind(':id', $post['id']);
			$this->execute();

			Messages::setMsg('Post has been deleted', 'success');
			header('Location: '. ROOT_PATH . 'shares');
			exit(0);
		} else {
			if($get['id'] != NULL || $get['id'] != ''){
				// Fetch post using GET parameter value
				$this->query('SELECT count(*) FROM shares WHERE id = :id');
				$this->bind(':id', $get['id']);
				$row = $this->countSet();
				if($row > 0){
					return $get['id'];
				} else {
					header('Location: ' . ROOT_PATH . 'shares');
				}
			} else {
				header('Location: ' . ROOT_PATH . 'shares');
			}
		}
	}
}

?>