FROM node:latest

EXPOSE 3003

WORKDIR /microVentas

COPY controllers /microVentas/controllers
COPY models /microVentas/models
COPY index.js /microVentas

RUN npm init --yes
RUN npm install express morgan mysql mysql2 axios

CMD node index.js
