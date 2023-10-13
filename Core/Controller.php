<?php

Class Controller{

	public function model($model){
		require_once("Models/".$model.".php");
		return new $model();
		}

	public function loadView($nameView, $dataModel=[], $dataModel2=[]){
		require_once 'Views/'.$nameView.'.php';
	}
}
?>