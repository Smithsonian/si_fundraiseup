# si_fundraiseup
Simple Drupal module to add the FundraiseUp javascript to the header.  You just need to enter the unit code provided.  The module is compatible with Drupal 8 and above.
## Installation & Implementation Steps
1. Add the following to the repositories array in composer.json
```    
{
    "type": "vcs",
    "url": "git@github.com:Smithsonian/si_fundraiseup.git"
    }
```
2. Run composer require drupal/si_fundraiseup to download the module
3. Enable the module and then add the unit code from the javascript snippet at /admin/config/services/fundraiseup
4. Change the donation link to the one provided by FundraiseUp.  If you are testing in your dev environment, change the url to the dev url for it to work.