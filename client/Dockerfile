FROM node:20.5.0-alpine3.18
RUN addgroup clientapp && adduser -S -G clientapp clientapp
USER clientapp
WORKDIR /app/
COPY --chown=clientapp:clientapp package*.json .
RUN npm install
COPY --chown=clientapp:clientapp . .
EXPOSE 4200
CMD ["npm","start"]