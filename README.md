# Image Uploader Laravel Backend Project (The backend for the Image Uploader Website deployed [here](https://imageuploader-adeoluwa.netlify.app/).)

This project was developed using `PHP` v "^8.0.2", `Laravel` v "^9.11", and `Cloudinary-labs/cloudinary-laravel` v "^1.0" libraries.

Deployed on a `Digital Oceans` Droplet using `Github Actions` for CI/CD.

The Image Uploader Website was deployed with `Netlify` link [here](https://imageuploader-adeoluwa.netlify.app/).

Figma design was provided by [devChallenges.io](https://devchallenges.io/).

You can clone project and customise at your end.

### API Documentation

- 'http://127.0.0.1:8000/api/v1/image/' Endpoint

METHOD: 'POST'

BODY: {'file': Image File}

SUCCESS RESPONSE (200): {'success': true, 'image_link': '**********'}

ERROR RESPONSE (4**, 5**): {'success': false, 'error': '***********'}





