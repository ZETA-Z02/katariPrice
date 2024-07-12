#!/bin/bash
/usr/bin/curl -c /var/www/html/katariPrice/doc/cookies.txt -X POST -d "usuario=zeta&password=zeta" http://localhost/katariPrice/login/logIn
/usr/bin/curl -b /var/www/html/katariPrice/doc/cookies.txt http://localhost/katariPrice/actions/caducidad
