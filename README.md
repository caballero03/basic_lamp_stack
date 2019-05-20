# basic_lamp_stack

## How to install:

**Step 1)**
Run this in the root folder of this project:
```bash
docker run --rm --interactive --tty \
    --volume $PWD:/app \
    --user $(id -u):$(id -g) \
    composer update --ignore-platform-reqs --no-scripts
```
    
**Step 2)**
Copy the file `sample.env` to another file called `.env`

**Step 3)**
Edit `.env` file to suit your project

**Step 4)**
Run: 
```bash
docker-compose up --build -d
```


**Step 5)**
Visit: [http://localhost:8080](http://localhost:8080) for webserver index page

also, visit: [http://localhost:8081](http://localhost:8081) for PHPMyAdmin DB tool


## Subsequent operation

**To remove running containers:**
Run:
```bash
docker-compose down
```

**To re-run without building:**
```bash
docker-compose up -d
```

