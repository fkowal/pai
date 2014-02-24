# -*- mode: ruby -*-
# vi: set ft=ruby :

# Vagrantfile API/syntax version. Don't touch unless you know what you're doing!
VAGRANTFILE_API_VERSION = "2"

$vbox_script = <<SCRIPT
sudo apt-get update -q
sudo apt-get install -q -y python-software-properties
sudo add-apt-repository -y ppa:ondrej/php5-oldstable
sudo apt-get update -q
sudo apt-get install -q -y php5-cli php5-mysql php5-sqlite sqlite
echo -e "#!/bin/bash\nsudo php -S 0.0.0.0:80 -t app/\n" > /home/vagrant/start.sh && chmod +x /home/vagrant/start.sh
[ ! -L /home/vagrant/app ] && ln -s /vagrant/app /home/vagrant
SCRIPT

Vagrant.configure(VAGRANTFILE_API_VERSION) do |config|
  config.vm.box = "precise32"
  config.vm.box_url = "http://files.vagrantup.com/precise32.box"
  config.vm.hostname = "dev"

  # config.vm.network :forwarded_port, guest: 80, host: 8080
  config.vm.network :private_network, ip: "192.168.33.12"
  # config.ssh.forward_agent = true
  # config.vm.synced_folder "./app", "/home/vagrant/app"

  config.vm.provider :virtualbox do |vb, override|
    override.vm.provision :shell, :inline => $vbox_script
    vb.customize ["modifyvm", :id, "--natdnshostresolver1", "on"]
    vb.customize ["modifyvm", :id, "--natdnsproxy1", "on"]
  end
end
