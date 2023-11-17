FROM node:latest

EXPOSE 3001

WORKDIR /microUsuarios

COPY controllers /microUsuarios/controllers
COPY models /microUsuarios/models
COPY index.js /microUsuarios/

RUN npm init --yes
RUN npm install express morgan mysql mysql2 axios

CMD node index.js
