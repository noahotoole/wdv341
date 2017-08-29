<!doctype html>
<html class="no-js" lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Noah O'Toole's WDV 341 Homework - Git Terminology</title>
    <link rel="stylesheet" href="css/foundation.css">
    <link rel="stylesheet" href="css/app.css">
  </head>
  
  <body>
	<div class="off-canvas-wrapper">
		
	
	<!-- Off Canvas Menu -->
			<div class="off-canvas position-left" id="mobile-menu" data-off-canvas>
				<ul>
					<li><a href="../index.html">Home</a></li>
				</ul>
			</div>
		
	<!-- Mobile Navigation -->	
			<div class="off-canvas-content" data-off-canvas-content>
				<div class="title-bar hide-for-medium">
					<div class="title-bar-left">
						<button class="menu-icon" type="button" data-open="mobile-menu"></button>
						<span class="title-bar-title">MENU</span>
					</div>
				</div>
	
    <!-- Desktop Navigation -->	
				<nav class="top-bar nav-desktop">
					<div class="wrap">

						<div class="top-bar-left">
							<h3 class="site-logo">Portfolio by Noah O'Toole</h3>
						</div>
						<div class="top-bar-right">
							<ul class="menu menu-desktop">
								<li><a href="../index.html">Home</a></li>
							</ul>
						</div>
					</div>  
				</nav>

	<!-- Hero Section -->
				<section class="hero">
					<div class="wrap">
						<h1>WDV 341 HOMEWORK</h1>
						<p> </p>
					</div>
				</section>
	
	<!-- Main Section -->	
				<section class="main">
					<div class="wrap row">
						<div class="small-12 medium-7 column">
							<h1>Git Terminology</h1>
							<hr>
							<p> 1. <b>Version Control Software</b> - A component of software configuration management, version control is the management of changes to documents, computer programs, large web sites, and other collections of information. </p>
							<p> 2. <b>Git</b> - Git is an open source program for tracking changes in text files. It was written by the author of the Linux operating system, and is the core technology that GitHub, the social and user interface, is built on top of. </p>
							<p> 3. <b>Repository</b> - A repository is the most basic element of GitHub. They're easiest to imagine as a project's folder. A repository contains all of the project files (including documentation), and stores each file's revision history. Repositories can have multiple collaborators and can be either public or private. </p>
							<p> 4. <b>Stage</b> - To stage a file is to prepare it finely for a commit. Git, with its index allows you to commit only certain parts of the changes you've done since the last commit. </p>
							<p> 5. <b>Commit</b> - A commit, or "revision", is an individual change to a file (or set of files). It's like when you save a file, except with Git, every time you save it creates a unique ID (a.k.a. the "SHA" or "hash") that allows you to keep record of what changes were made when and by who. Commits usually contain a commit message which is a brief description of what changes were made. </p>
							<p> 6. <b>Push</b> - Pushing refers to sending your committed changes to a remote repository, such as a repository hosted on GitHub. For instance, if you change something locally, you'd want to then push those changes so that others may access them.</p>
							<p> 7. <b>Pull</b> - Pull refers to when you are fetching in changes and merging them. For instance, if someone has edited the remote file you're both working on, you'll want to pull in those changes to your local copy so that it's up to date. </p>
							<p> 8. <b>Revert</b> - Reverting undoes a commit by creating a new commit. This is a safe way to undo changes, as it has no chance of re-writing the commit history. For example, the following command will figure out the changes contained in the 2nd to last commit, create a new commit undoing those changes, and tack the new commit onto the existing project. </p>
							<p> 9. <b>Branching</b> - A branch is a parallel version of a repository. It is contained within the repository, but does not affect the primary or master branch allowing you to work freely without disrupting the "live" version. When you've made the changes you want to make, you can merge your branch back into the master branch to publish your changes. </p>
							<p>10. <b>Merging</b> - Merging takes the changes from one branch (in the same repository or from a fork), and applies them into another. This often happens as a pull request (which can be thought of as a request to merge), or via the command line. A merge can be done automatically via a pull request via the GitHub web interface if there are no conflicting changes, or can always be done via the command line. </p>
							<p>11. <b>Change History</b> - Each regular Git commit will have a log message explaining what happened in the commit. These messages provide valuable insight into the project history. During a rebase, you can run a few commands on commits to modify commit messages. </p>
							<p>12. <b>Clone</b> - A clone is a copy of a repository that lives on your computer instead of on a website's server somewhere, or the act of making that copy. With your clone you can edit the files in your preferred editor and use Git to keep track of your changes without having to be online. It is, however, connected to the remote version so that changes can be synced between the two. You can push your local changes to the remote to keep them synced when you're online. </p>	
						</div>
						
				</section>	
	
	<!-- Footer -->
	
				<footer>
					<div class="wrap row small-up-1 medium-up-3">
						<div class="column">
							<h4>Contact Info</h4>
							<hr>
							<a href="#"><span>Phone</span> 515 490 4842</a>
							<a href="#"><span>Email</span> noahotoole@gmail.com</a>
							<a href="#"><span>Address</span> West Des Moines, Iowa</a>
						</div>
	
						<div class="column">
							<h4>Site Map</h4>
							<hr>
							<a href="#">About Me</a>
							<a href="#">Services</a>
							<a href="#">Contact Me</a>
						</div>
	
						<div class="column">
							<h4>Social Media</h4>
							<hr>
							<a href="#">Facebook</a>
							<a href="#">Twitter</a>
							<a href="#">Instagram</a>
						</div>
					</div>
				</footer>
				
			</div>
		</div>
	</div>

	
    <script src="js/vendor/jquery.js"></script>
    <script src="js/vendor/what-input.js"></script>
    <script src="js/vendor/foundation.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>
