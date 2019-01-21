<?php
class MoviesController extends Controller
{
	public function moviesAction()
	{
		$orm = new ORM();
		$movies = $orm->find('films', array('ORDER BY' => 'production DESC'));
		$this->render("movies", array('movies' => $movies));
	}

	public function resumAction()
	{
		$orm = new ORM();
		$detail = $orm->find('films', array('WHERE' => 'id_film = '. $_GET['id']));
		$this->render("detail", array('detail' => $detail));
	}

	public function addmoviesAction()
	{
		$this->render('addmovies');
	}

	public function addfilmAction()
	{
		$array = $this->request->post();
		$UserModel = new UserModel($array);

		if(!empty($array['title']) && !empty($array['resum']) && !empty($array['cover']) && !empty($array['genre']) && !empty($array['production']))
		{
			$orm = new ORM();
			$add = $orm->create('films', array(
				'id_genre' => $array['genre'],
				'title' => $array['title'],
				'resum' => $array['resum'],
				'cover' => $array['cover'],
				'production' => $array['production']
			));
			$_SESSION['flash']['error'] = "Le film a été ajouté.";
			header('Location: /webacademie_sem2/PiePHP/add/movies');
		}
		else{
			$_SESSION['flash']['error'] = "Il faut remplir tous les champs.";
			header('Location: /webacademie_sem2/PiePHP/add/movies');
		}

		if(empty($array['title']) && empty($array['resum']) && empty($array['cover']) && empty($array['genre']) && empty($array['production']))
		{
			$_SESSION['flash']['error'] = "Il faut remplir tous les champs.";
			header('Location: /webacademie_sem2/PiePHP/add/movies');
		}
	}

	public function deleteMovieAction()
	{
		$this->render('delete');
	}

	public function deleteAction()
	{
		$array = $this->request->post();
		$UserModel = new UserModel($array);

		if(!empty($array['delete']))
		{
			$orm = new ORM();
			$delete = $orm->delete('films', $array['delete']);
			$_SESSION['flash']['error'] = "Le film a été supprimé.";
			header('Location: /webacademie_sem2/PiePHP/delete/film');
		}
		else{
			$_SESSION['flash']['error'] = "Il faut remplir le champ.";
			header('Location: /webacademie_sem2/PiePHP/delete/film');
		}

		if(empty($array['delete']))
		{
			$_SESSION['flash']['error'] = "Il faut remplir le champ.";
			header('Location: /webacademie_sem2/PiePHP/delete/film');
		}
	}
}