FROM node:latest

EXPOSE 3002

WORKDIR /microProductos

COPY controllers /microProductos/controllers
COPY models /microProductos/models
COPY index.js /microProductos/
COPY productos.csv /microProductos/

RUN npm init --yes
RUN npm install express morgan mysql mysql2 axios xlsx

CMD node index.js
