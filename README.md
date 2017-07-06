# Hook Documenter

[![Travis Build](https://api.travis-ci.org/ffmengineering/hookdocumenter.svg?branch=master "Travis Build")](https://travis-ci.org/ffmengineering/hookdocumenter)

document various hook types like observers and aspects for several types of frameworks

## Support
- [Magento 1 Observers](https://github.com/ffmengineering/hookdocumenter/blob/master/docs/magento1-observers.md)

## Usage
- Install via composer
- run via `vendor/bin/documenter [job] [path] [link type] [git owner/project] [branch] [output format]`

For example: `vendor/bin/documenter magento1:observers app/code/community github ffm/project master markdown`

## Authors
- Sander Mangel

note: for support, please use the [Issue Tracker](https://github.com/ffmengineering/hookdocumenter/issues)

## Contribute
Contributions are more than welcome. Make a Pull Request to help out

## Roadmap 
- Add short technical analysis on the method attached (Sets order data, loads X objects, etc)
- Magento 2 Observers
- Magento 2 Plugins
