#!/bin/bash
#
#   將已經進入 git cached 的檔案進行 eslint check
#

git stash -q --keep-index

git diff-index --cached HEAD --name-only --diff-filter ACMR | egrep '.(js|jsx|ts|tsx)$' | xargs $(npm bin)/eslint
RESULT=$?

git stash pop -q

[ $RESULT -ne 0 ] && exit 1
exit 0
