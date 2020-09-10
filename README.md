# API-email

## Start le serveur API
`php -S localhost:1664`
`composer require phpmailer/phpmailer`

## Dependency
`composer require vlucas/phpdotenv`

## Link namespace to folder
- Add the `psr-4` into `composer.json`:
```json
"autoload": {
	"psr-4": {
		"App\\": "App/"
	}
}
```
- Update autoload:  
`php composer dump-autoload `