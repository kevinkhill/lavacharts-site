# -*- mode: ruby -*-
# vi: set ft=ruby :

Vagrant.configure("2") do |config|

    config.vm.box = "scotch/box"
    config.vm.network "private_network", ip: "192.168.33.10"
    config.vm.hostname = "scotchbox"
    config.vm.synced_folder ".", "/var/www", :mount_options => ["dmode=777", "fmode=666"]
    config.vm.provision "shell" do |s|
        s.privileged = false
        s.path = "https://gist.githubusercontent.com/kevinkhill/ffb8f3f4a53a053f67a1/raw/lavacharts-vagrant-provisioner.sh"
    end

    config.vm.provider "virtualbox" do |v|
      v.memory = 2048
      v.cpus = 2
    end

    # Optional NFS. Make sure to remove other synced_folder line too
    #config.vm.synced_folder ".", "/var/www", :nfs => { :mount_options => ["dmode=777","fmode=666"] }

end
