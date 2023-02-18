# git hooks


## git hooks 列表

```
Hook 名稱            觸發指令
------------------- --------------------------------------------
applypatch-msg      git am
pre-applypatch      git am
post-applypatch     git am
pre-commit          git commit
prepare-commit-msg  git commit
post-commit         git commit
post-checkout       git checkout and git clone
post-merge          merge or git pull
pre-push            git push
pre-receive         git-receive-pack on the remote repo
update              git-receive-pack on the remote repo
post-update         git-receive-pack on the remote repo
post-rewrite        git commit --amend, git-rebase
```

## 手動 example
```bash
cp --no-clobber tools/scripts/eslint-pre-commit.sh .git/hooks/pre-commit
chmod 775                                          .git/hooks/pre-commit
```

## 使用 husky 套件指定要執行的 shell (未成功 !!!!)
```bash
# step 1
# 指定 node 版本 ？？？？, 安裝套件, 在 package.json 加入指令, 執行指令
nvm use v12.16.3
npm install husky --save-dev
npm set-script prepare "husky install"
npm run prepare

```
