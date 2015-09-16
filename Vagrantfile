# -*- mode: ruby -*-
# vi: set ft=ruby :

GIST_BASE = "https://gist.githubusercontent.com/kevinkhill/"
php_vagrant_provisioner  = "ffb8f3f4a53a053f67a1"
apache_vhost_provisioner = "ad836db19d3c5ef89076"

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.hostname = "scotchbox"
    config.vm.network "private_network", ip: "192.168.33.10"

    config.vm.synced_folder ".", nil,
        :disabled => true,
        :id => "vagrant-root"

    config.vm.synced_folder "_site/", "/var/www/lavadocs.local/public",
        type: "rsync",
        create: true,
        rsync__exclude: ".git/",
        :mount_options => ["dmode=777", "fmode=666"]

    config.vm.synced_folder ".", "/vagrant",
        type: "rsync",
        create: true,
        rsync__exclude: ".git/",
        :mount_options => ["dmode=777", "fmode=666"]

    config.vm.provider "virtualbox" do |v|
      v.memory = 512
      v.cpus = 1
    end

    config.vm.provision "phpenv", type: "shell" do |s|
        s.privileged = false
        s.path = GIST_BASE + php_vagrant_provisioner + "/raw"
    end

    config.vm.provision "vhost", type: "shell" do |s|
        s.privileged = true
        s.path = GIST_BASE + apache_vhost_provisioner + "/raw"
    end

    config.vm.provider "virtualbox" do |v|
        v.memory = 1024
        v.cpus = 2
    end

end
