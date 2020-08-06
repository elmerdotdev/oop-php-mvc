<?php

class UserModel extends Model{
	public function register(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['password'])){
			$password = password_hash($post['password'], PASSWORD_DEFAULT);
		} else {
			$password = '';
		}

		if(isset($post['submit'])){
			if($post['name'] == '' || $post['email'] == '' || $post['password'] == ''){
				Messages::setMsg('Please fill in the required fields', 'error');
				return;
			}
			// Insert into mySQL
			$this->query('INSERT INTO users (name, email, password) VALUES (:name, :email, :password)');
			$this->bind(':name', $post['name']);
			$this->bind(':email', $post['email']);
			$this->bind(':password', $password);
			$this->execute();

			// Verify
			if($this->lastInsertId()){
				Messages::setMsg('Account created. You can now login', 'success');
				// Redirect
				header('Location: ' . ROOT_PATH . 'users/login');
				exit(0);
			}
		}

		return;
	}

	public function login(){
		// Sanitize POST
		$post = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);

		if(isset($post['submit'])){
			if($post['password'] == '' || $post['email'] == ''){
				Messages::setMsg('Please fill in the required fields', 'error');
				return;
			}
			// Check if email match in database
			$this->query('SELECT * FROM users WHERE email = :email');
			$this->bind(':email', $post['email']);
			$row = $this->single();

			if($row){
				if(password_verify($post['password'], $row['password'])) {
					$_SESSION['is_logged_in'] = true;
					$_SESSION['user_data'] = array(
						"id" => $row['id'],
						"name" => $row['name'],
						"email" => $row['email']
					);
					Messages::setMsg('You have logged in successfully', 'success');
					header('Location: ' . ROOT_PATH . 'shares');
					exit(0); // This line solves the issue where $_SESSION['successMsg'] is unset after header redirection
				} else {
				    Messages::setMsg('Password is incorrect', 'error');
					return;
				}
			} else {
				Messages::setMsg('User not found', 'error');
			}
		}

		return;
	}
}

?>