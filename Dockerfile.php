ARG CLI_IMAGE
FROM ${CLI_IMAGE} as cli

FROM amazeeio/php:7.2-fpm

COPY --from=cli /app /app

#RUN apk add --no-cache openldap-dev
#RUN docker-php-ext-install ldap
RUN apk add --no-cache php7-ldap
RUN docker-php-ext-enable /usr/lib/php7/modules/ldap.so
