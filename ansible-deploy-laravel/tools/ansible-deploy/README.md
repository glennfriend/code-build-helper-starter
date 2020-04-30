# Ansible

## staging/production server setting
```
sudo mkdir /opt/www
sudo chown -R ubuntu.ubuntu /opt/www
```

## first install
```
ansible-galaxy install -r tools/ansible-deploy/requirements.yml

cp --no-clobber tools/ansible-deploy/env.yml.example  tools/ansible-deploy/env.yml
```

## deploy to localhost
```
ansible-playbook tools/ansible-deploy/app-local.yml -e "env=local"
or
clear && ansible-playbook tools/ansible-deploy/app.yml -e "CI_BRANCH=master" -e "env=local" ; cat /tmp/ansible.log
```

## deploy to staging
clear && ansible-playbook tools/ansible-deploy/app.yml -e "CI_BRANCH=master" -e "env=staging"

## deploy to production
clear && ansible-playbook tools/ansible-deploy/app.yml -e "CI_BRANCH=master" -e "env=production"
