<?php
/* 
 * (C) Copyright 2017 CEFRIEL (http://www.cefriel.com/).
 * 
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 * 
 *     http://www.apache.org/licenses/LICENSE-2.0
 * 
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 * 
 * Contributors:
 *     Andrea Fiano, Gloria Re Calegari, Irene Celino.
 */
 
include 'jwt.php';
include_once '../secret/globals.php';

$credentials=json_decode(file_get_contents('php://input')); //get user from

if($credentials->username=='admin' && $credentials->password==$GLOBALS['admin_password']) {
	
	$user = [ 'idUser' => 0 ];	
	$jwt = generateToken($user, 'ADMIN');		
	
	$json = [ 'token' => $jwt ];
	echo json_encode($json);
}
else {
	http_response_code(401);
	$json = [ 'error' => 'Invalid credentials' ];
	echo json_encode($json);	
}

?>