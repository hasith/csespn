<?php
// Init vars
$LOCAL_ROOT         = "/var/www/";
$LOCAL_REPO_NAME    = "csespn";
$LOCAL_REPO         = "{$LOCAL_ROOT}/{$LOCAL_REPO_NAME}";
$REMOTE_REPO        = "https://github.com/scnakandala/csespn.git";
$BRANCH     = "master";

// Delete local repo if it exists
if (!file_exists($LOCAL_REPO)) {
    // Clone fresh repo from github using desired local repo name and checkout the desired branch
    echo shell_exec("cd {$LOCAL_ROOT} && git clone {$REMOTE_REPO} {$LOCAL_REPO_NAME} && cd {$LOCAL_REPO} && git checkout {$BRANCH}");
}

// Clone fresh repo from github using desired local repo name and checkout the desired branch
echo shell_exec("cd {$LOCAL_ROOT} && git pull");

// Updating database
echo shell_exec("cd {$LOCAL_REPO} && cd database_backups && bash ./db_update.sh");

die("done " . mktime());