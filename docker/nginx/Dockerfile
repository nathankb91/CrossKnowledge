FROM nginx:latest

ADD php.conf /etc/nginx/conf.d/php.conf
ADD js.conf /etc/nginx/conf.d/js.conf
ADD css.conf /etc/nginx/conf.d/css.conf

CMD ["nginx", "-g", "daemon off;"]
