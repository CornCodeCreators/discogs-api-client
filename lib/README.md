# The unofficial official Discogs-Api-Client for PHP

This API-Client for interacting with [Discogs API](https://www.discogs.com/developers/) is built with Symfony. 

It supports two types of clients based on the Discogs authentication methods:
1. **Personal Access Tokens**: For accessing public resources and private user data.
2. **OAuth**: For more complex scenarios requiring user authorization.

> **Remark:**  
> This Client supports already the main required functions, but it is also still in development and contribution is highly appreciated.

---

## Features

- **Support for Multiple Authentication Types**: Easily switch between OAuth 1.0a and Discogs Token.
- **DTO-Based Design**: The library is designed with a strong emphasis on Data Transfer Objects (DTOs), promoting clean and maintainable PHP code. The use of DTOs ensures well-structured and type-safe data handling and readable code.
- **Symfony Compatibility**: Built for integration into Symfony projects.

---

## Requirements

> **Remark:** to be cross-checked

- PHP 8.1 or higher
- Symfony 6.0 or higher
- A valid Discogs account and API key/token

---

### Setup
#### Installation

Use Composer to add the client to your Symfony project:

> **Remark:** to be cross-checked
```bash
composer require your-vendor/discogs-api-client
```

#### Configure your credentials
Put these variables into your `.env`-file.
```env
DISCOGS_USER_AGENT=null
DISCOGS_USER_TOKEN=your_token
DISCOGS_CONSUMER_KEY=your_consumer_key
DISCOGS_CONSUMER_SECRET=your_consumer_secret
```
---

## Client-Initialization
There are two clients to interact with the API. Either you use your personal token, or the clien

The client supports two types of authentication:

- **OAuth 1.0a**
- **Discogs Token**
### User Token

```php
use CornCodeCreators\Discogs\Client\PersonalTokenClient;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;use Symfony\Component\Routing\Attribute\Route;

class PersonalTokenController extends AbstractController
{
    public function __construct(
        private readonly PersonalTokenClient $discogs,
    ) {
    }

    #[Route('/release1234', name: 'app_release_1234')]
    public function index(): void
    {
        $release = $discogs->requestDatabase()->getRelease(1234);
        
        // ...
    }
}
```

### Consumer Key and Secret

```php
namespace CornCodeCreators\Discogs\Controller;

use CornCodeCreators\Discogs\Client\OAuthClient;use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;use Symfony\Component\HttpFoundation\RedirectResponse;use Symfony\Component\HttpFoundation\Request;use Symfony\Component\Routing\Attribute\Route;use Symfony\Component\Routing\Generator\UrlGeneratorInterface;

class OAuthController extends AbstractController
{
    public function __construct(
        private readonly OAuthClient $discogsApiClient,
    ) {
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
        $release = $this->discogsApiClient->requestDatabase()->getRelease(249504);

        dump('Dummy Homepage');
        dump($release);
        dd('die');
    }
}
```

## Making Requests
The requests are launched by the structure provided by the API-Documentation

1) Database
2) ...
3) ...

### Database

```php
$release = $this->discogsApiClient->requestDatabase()->getRelease(249504);
```

## Documentation

Refer to the [Discogs Developer Documentation](https://www.discogs.com/developers/#page:authentication) for detailed information on API endpoints and authentication methods.

## Contributing

Feel free to fork this repository and contribute by submitting a pull request. Any contributions to enhance functionality or add features are welcome!

## License

This project is licensed under the MIT License. See the [MIT License](LICENSE). file for more details.

---