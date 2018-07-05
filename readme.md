# Server is Red Hat Enterprise Linux Server release 7.5 (Maipo)
# Execute the following commands on it:

    # enable php 7 repos to install php 7.2
    yum install https://dl.fedoraproject.org/pub/epel/epel-release-latest-7.noarch.rpm
    yum install http://rpms.remirepo.net/enterprise/remi-release-7.rpm
    yum install yum-utils
    yum-config-manager --enable remi-php72 
    # install php 7.2 and needed modules and apache and mysql database and git
    yum install  -y  php php-mcrypt php-cli php-gd php-curl php-mysql php-ldap php-zip php-fileinfo php-mbstring php-dom php-mysql mariadb mariadb-server httpd git
    # check php version 
    php -v
    # enable http and mysql
    systemctl enable httpd && systemctl enable mariadb 
    # start http and mysql
    systemctl start mariadb && systemctl start httpd
    # add username to git to be able to pull from repo
    git config --global user.email {email}
    # generate ssh key to add to git to enable pulling without password 
    ssh-keygen -t rsa -C "samasat@yahoo.com"
    # show public key and paste it into git (look up add ssh key to git)
    cat .ssh/id_rsa.pub 
    # move to html direcotyr to copy application to that 
    cd /var/www/html/
    # copy project
    git clone git@github.com:GamalTawaf/Zoom.io.git
    # rename project folder for eaiser refernces 
    mv Zoom.io app
    # install composer
    php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
    php -r "if (hash_file('SHA384', 'composer-setup.php') === '544e09ee996cdf60ece3804abc52599c22b1f40f4323403c44d44fdfdd586475ca9813a858088ffbc1f233e9b180f061') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
    php composer-setup.php --install-dir=/bin  --filename=composer
    composer
    # run composer isntall to install info
    composer install
    # generate key for enviroment 
    php artisan key:generate
    # add vhost info to tell apache which location to serve the application from
    vi /etc/httpd/conf.d/{websitename}.conf
    
    <VirtualHost *:80>
        ServerName {websitename} 

        ServerAdmin {website_admin_email}
        DocumentRoot /var/www/html/app/public 

        <Directory /var/www/html/app>
          Require all granted
          Options Indexes FollowSymLinks MultiViews
            AllowOverride All
            Order allow,deny
            allow from all
        </Directory>

        ErrorLog /var/log/httpd/error.log
        CustomLog /var/log/httpd/access.log combined
    </VirtualHost>

    # Create zoomdb run following commands
    mysql 
    create database zoomdb;
    exit
    # run migrations with seeding
    php artisan migrate --seed

   # if you keep getting log permission error 
   look at this answer https://stackoverflow.com/questions/44871684/run-laravel-application-on-red-hat
