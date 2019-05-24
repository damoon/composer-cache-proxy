# Cito

## installation
`composer global require damoon/cito`

## configuration
`DEBUG=1` enables debug output
`CITO_SERVER=http://127.0.0.1:8080` sets cito cache server

## testing
`rm -rf $HOME/.cache/composer/ vendor`
`DEBUG=1 composer require amphp/http-server`
