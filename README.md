#DCoders EMail sender PHP scripts

####Features
* DCoders is a simple responsive single page website developed in Bootstrap CSS and PHP Codeigniter framework.
* Email sender PHP script for webhosts where SMTP support is not available. (such as OpenShift)
* MailGun email sender PHP script
* Gmail email sender PHP script

Following PHP scripts can be used as email sender

####Email sender PHP scripts needs following configurations:
######File location: /application/controllers/guest_Gmail_Mail_Sender.php

```sh
/** File: /application/controllers/guest_Gmail_Mail_Sender.php **/

	$config = Array(
		'protocol' => 'smtp',
		'smtp_host' => 'ssl://smtp.googlemail.com',
		'smtp_port' => 465,
		'smtp_user' => 'ankit.wasankar12',
		'smtp_pass' => '*************',
		'mailtype'  => 'html', 
		'charset'   => 'iso-8859-1'
	);
```

######File location: application/controllers/guest_MailGun_Mail_sender.php

```sh
/** File: application/controllers/guest_MailGun_Mail_sender.php **/

		$config = Array(
			'protocol' => 'smtp',
			'smtp_host' => 'ssl://smtp.mailgun.org',
			'smtp_port' => 465,
			'smtp_user' => '***********',
			'smtp_pass' => '***********',
			'mailtype'  => 'html', 
			'charset'   => 'iso-8859-1'
		);
```

###Live code demo is available at following url:
<a href="http://github.mytechblog.in/DCoders/index.php"> GitHub.MyTechBlog.in/DCoders </a>
