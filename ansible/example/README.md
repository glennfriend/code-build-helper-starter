# Ansible

## first install
```
ansible-galaxy install -r requirements.yml
```

## deploy to localhost
```
ansible-playbook site-laravel-app.yml
or
clear && ansible-playbook site-laravel-app.yml -e "CI_BRANCH=master" ; cat /tmp/ansible-system-info.log
```
