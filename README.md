**The official unofficial**
# Discogs-Api-Client for PHP

 
This API-Client was built on PHP to interact with [Discogs API](https://www.discogs.com/developers/) by supporting both authentication methods and providing a clean way to act with the data via DTO-Objects.

> **Remark:**  
> This Client supports already the main required functions, improvements will come over time, and contribution is always welcome.


## Quick'n Dirty Example
This client will provide you quickly access to the Discogs API and deliver nice DTO-objects holding the data, so that you can easily use it in your PHP-application.

```php
// create your client object
$discogsApiClient = new PersonalTokenClient();

// load the desired release-data from the Discogs API
$release = $discogsApiClient->requestDatabase()->getRelease(123);

// get the title of the release
$title = $release->getTitle();

// show all images of the release
foreach ($release->getImages() as $image) {
    $url = $image->getResourceUrl();
    echo "<img alt='{$title}' src='{$url}'>";
}
```
## Features

- **Easy:** This client is super easy to use!
- **Interaction with Discogs API:** Get all data you need from Discogs and interact with it!
- **Support for both Authentication Methods**: Easily switch between OAuth 1.0a and Discogs Token.
  - **Personal Access Tokens**: For accessing public resources and private user data.
  - **OAuth**: For more complex scenarios requiring user authorization.
- **DTO-Based Design**: The library is designed with a strong emphasis on Data Transfer Objects (DTOs), promoting clean and maintainable PHP code. The use of DTOs ensures well-structured and type-safe data handling and readable code.



## Requirements
- PHP 8.1 or higher
- A valid Discogs account and API key/token



## Setup
### Installation

Use Composer to add the client to your Symfony project:

> **Remark:** to be cross-checked
```bash
composer require your-vendor/discogs-api-client
```

### Configure your credentials (optional)
Put these variables into your `.env`-file, so you do not to need to put your credentials into the constructor of the API-Client.

```env
DISCOGS_USER_AGENT=your_agent_name
DISCOGS_USER_TOKEN=your_token
```
or
```env
DISCOGS_USER_AGENT=your_agent_name
DISCOGS_CONSUMER_KEY=your_consumer_key
DISCOGS_CONSUMER_SECRET=your_consumer_secret
```


## Client-Initialization
There are two clients to interact with the API. Either you use your PersonTokenClient, or the OAuth-client.
### Personal-Token-Client
This is the simplest way to interact with Discogs API and is supporting access to everything you can get from Discogs. You should start with this solution and only swap to the OAuth-Client, if you really see a need.
#### Using Env-Variables
```php
use CornCodeCreators\Discogs\Client\PersonalTokenClient;

$discogsApiClient = new PersonalTokenClient();
$release = $discogsApiClient->requestDatabase()->getRelease(1234);

// ...
```
#### Using Parameters
*Remark:* You should try to avoid this solution to avoid compromising your credentials.
```php
use CornCodeCreators\Discogs\Client\PersonalTokenClient;

$userAgent = 'MyAgent';
$userToken = 'abcdefg';

$discogsApiClient = new PersonalTokenClient($userAgent, $userToken);
$release = $discogsApiClient->requestDatabase()->getRelease(1234);

// ...
```
### OAuth-Client
#### Using Env-Variables
```php
use CornCodeCreators\Discogs\Client\OAuthClient;

$discogsApiClient = new OAuthClient();
$release = $discogsApiClient->requestDatabase()->getRelease(1234);

// ...
```
##### Using Parameters
*Remark:* You should try to avoid this solution to avoid compromising your credentials.
```php
use CornCodeCreators\Discogs\Client\OAuthClient;

$userAgent      = 'MyAgent';
$consumerKey    = 'abcdefg';
$consumerSecret = '1234567';

$discogsApiClient = new OAuthClient($userAgent, $consumerKey, $consumerSecret);
$release = $discogsApiClient->requestDatabase()->getRelease(1234);
```
##### Symfony example
The OAuth-Flow requires multiple interaction steps between your application via this client and the Discogs-Server. This requires typically multiple controllers on your side. The example below is using Symfony 
```php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use CornCodeCreators\Discogs\Client\OAuthClient;

class OAuthController extends AbstractController
{
    private $discogsApiClient;

    public function __construct(
    ) {
        $this->discogsApiClient = new OAuthClient();
    }

    #[Route('/oauth', name: 'app_oauth_step1')]
    public function oauth(): RedirectResponse
    {
        $callbackUrl = $this->generateUrl('discogs_callback', [], UrlGeneratorInterface::ABSOLUTE_URL);
        $tokens      = $this->discogsApiClient->getRequestToken($callbackUrl);

        return $this->redirect($this->discogsApiClient->getAuthorizeUrl());
    }

    #[Route('/callback', name: 'discogs_callback')]
    public function callback(Request $request): RedirectResponse
    {
        $oauthVerifier = $request->query->get('oauth_verifier');
        $tokens        = $this->discogsApiClient->getAccessToken($oauthVerifier);

        return $this->redirectToRoute('app_homepage');
    }

    #[Route('/home', name: 'app_homepage')]
    public function home(): void
    {
        dump("Hello world! -> 'Dummy Homepage");

        $release = $this->discogsApiClient->requestDatabase()->getRelease(249504);

        dd($release);
    }
}
```



## Making Requests
The requests follow the structure provided by the API-Documentation

1) Database
2) UserIdentity
3) (more to come)

> **Remark:** This is not an exhausting list, but only good examples to start!

### Database

```php
$data = $discogsApiClient->requestDatabase()->getRelease(249504);
$data = $discogsApiClient->requestDatabase()->getReleaseRatingOfUser(399193, 'Someone');
$data = $discogsApiClient->requestDatabase()->getReleaseRatingOfCommunity(399193);
$data = $discogsApiClient->requestDatabase()->getReleaseStats(399193);
$data = $discogsApiClient->requestDatabase()->getMasterRelease(1000);
$data = $discogsApiClient->requestDatabase()->getMasterReleaseVersions(1000);
$data = $discogsApiClient->requestDatabase()->getArtist(108713);
$data = $discogsApiClient->requestDatabase()->getLabel(1);
$data = $discogsApiClient->requestDatabase()->getArtistReleases(108713, ['per_page' => 42]);
$data = $discogsApiClient->requestDatabase()->getLabelReleases(1, ['per_page' => 5]);
$data = $discogsApiClient->requestDatabase()->searchAllTypes(['q' => 'Nirvana', 'per_page' => 5]);
$data = $discogsApiClient->requestDatabase()->addReleaseRatingOfUser(400788, 'Someone', 3);
$data = $discogsApiClient->requestDatabase()->removeReleaseRatingOfUser(400788, 'Someone');
```

### UserIdentity
```php
$data = $discogsApiClient->requestUser()->getIdentity();
$data = $discogsApiClient->requestUser()->getProfile("Someone");
$data = $discogsApiClient->requestUser()->getSubmissions("Someone");
$data = $discogsApiClient->requestUser()->getContributions("Someone");
$data = $discogsApiClient->requestUser()->updateProfile("Someone", ['name' => 'Jon Doe', 'profile' => 'Someone nobody knows']);
```

## Documentation

Refer to the [Discogs Developer Documentation](https://www.discogs.com/developers/#page:authentication) for detailed information on API endpoints and authentication methods.

## Contributing

Feel free to fork this repository and contribute by submitting a pull request. Any contributions to enhance functionality or add features are welcome!

## License

This project is licensed under the MIT License. See the [MIT License](LICENSE). file for more details.

