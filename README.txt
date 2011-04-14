This is a simple page that lists git repositories in a directory
and allows bare repositories to be created. This is a port of the homepage
from the GitAspx project (http://github.com/JeremySkinner/git-dot-aspx).

To configure, edit config.php and set the GIT_EXECUTABLE path to where git is installed
and set REPOSITORY_ROOT to your repositories directory. The CHECK_DIRS_ARE_REPOS will 
select whether repository directories should be verified as git repositories.