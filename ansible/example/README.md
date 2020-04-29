# Ansible

## staging/production server setting
```
sudo mkdir /opt/www
sudo chown -R ubuntu.ubuntu /opt/www
```

## first install
```
ansible-galaxy install -r requirements.yml
```

## deploy to localhost
```
ansible-playbook site-laravel-app.yml
or
clear && ansible-playbook app-local.yml -e "CI_BRANCH=master" ; cat /tmp/ansible-system-info.log
```

## deploy to staging
clear && ansible-playbook app-staging.yml -e "CI_BRANCH=master"
