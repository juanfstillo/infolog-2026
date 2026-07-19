# Deploying to Hetzner

This app has no real dependency on a database — content lives in `config/site.php`,
sessions use the `file` driver, cache is `file`, queue is `sync`.

The Hetzner box (`204.168.199.131`) runs everything in Docker, with
[Nginx Proxy Manager](http://204.168.199.131:81) (container `proxy-nginx-1`) reverse-proxying
domains to per-app containers on their own host ports. There is no bare-metal PHP/nginx/node
on this server — each app is its own Docker image. This project follows the same pattern as
the other Laravel app on the box (`/root/ds4ps-manual`).

**Currently there is no domain pointed at this app** — it's reachable directly at
`http://204.168.199.131:8082` for client review. See "Adding a domain later" below for when
that changes.

## Layout on the server

```
/root/infolog-2026/          # git checkout
  docker-compose.prod.yml
  .env.docker                # real secrets, not in git — copy from .env.docker.example
```

## First deploy

```bash
ssh root@204.168.199.131
git clone https://github.com/juanfstillo/infolog-2026.git /root/infolog-2026
cd /root/infolog-2026

cp .env.docker.example .env.docker
# edit .env.docker: set APP_KEY (generate with the command in the comment)

docker compose -f docker-compose.prod.yml up -d --build
```

The entrypoint (`docker/entrypoint.sh`) writes `.env` inside the container from
`.env.docker`, then runs `config:cache`, `route:cache`, `view:cache`, and `storage:link`
on every start.

## Redeploying after future changes

```bash
ssh root@204.168.199.131
cd /root/infolog-2026
git pull
docker compose -f docker-compose.prod.yml up -d --build
```

## Adding a domain later

Once a domain points at `204.168.199.131`:

1. Update `APP_URL` in `.env.docker` to the real `https://` URL.
2. In Nginx Proxy Manager (`http://204.168.199.131:81`), add a Proxy Host pointing the
   domain at `infolog-app:80` (or `127.0.0.1:8082` if not on the same Docker network) and
   request a Let's Encrypt certificate through the UI.
3. `docker compose -f docker-compose.prod.yml up -d` to pick up the new `.env.docker`.

## Troubleshooting

```bash
docker compose -f docker-compose.prod.yml logs -f app
docker compose -f docker-compose.prod.yml exec app php artisan tinker
```
