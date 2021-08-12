# WordPress theme for itsaboutpeepl.com

This is a child theme of [Twenty Twenty-One](https://wordpress.org/themes/twentytwentyone/).

## Local development

### Building the CSS files

You will need [Sass](https://sass-lang.com/install) installed on your machine.

Then, to build the CSS files, run the update script:

    script/update

If you want to immediately see your new styles on the live site, run the deploy script:

    script/deploy

Beware, this overwrites the files on the live site, so only do it for minor changes. Anything major should be tested in a local copy of the itsaboutpeepl.com WordPress site instead – see Docker instructions below.

### Running a local copy of itsaboutpeepl.com in Docker

You will need [Docker](https://docs.docker.com/get-docker/) installed on your machine.

Start the containers:

    docker-compose up

Then run the automated setup script inside the `itsabouteepl_wordpress` container:

    docker-compose exec itsaboutpeepl_wordpress /usr/local/bin/setup.sh

Your local copy of itsaboutpeepl.com should be accessible at <http://localhost:7000>.

PHPMyAdmin will be accessible at <http://localhost:7001>.

### Troubleshooting

If you get an error like `Cannot start service […] Ports are not available: listen tcp 0.0.0.0:7001: bind: address already in use` when running `docker-compose up`, then you may already have a process running on your machine using that port.

For example, if the error mentions port `7001` (as above), and you’re on a Mac, then you can find the PID of the process using that port with:

    lsof -i tcp:7001

To help you debug, you can take the offending PID (in this case, `918`) and see which command initiated the process:

    ps -ww -p 918

To solve the `address already in use` error, you can either kill the process currently using the port, or tell Docker to use a different port for the container(s) you’re trying to launch.

If, say, you wanted Docker to use port `9001` rather than `7001` for the `itsaboutpeepl_phpmyadmin` container, you could either modify the ports in `docker-compose.yml` directly, or create your own additional compose file, eg: `docker-compose-custom.yml`, with content like this:

    version: "3"
    services:
      itsaboutpeepl_phpmyadmin:
        ports:
          - 9001:80

And then modify your `docker-compose up` command to use _both_ compose files:

    docker-compose -f docker-compose.yml -f docker-compose-custom.yml up

### Tips for working with the Docker containers

To enter into an interactive shell inside the `itsaboutpeepl_wordpress` container, you can run:

    docker-compose exec itsaboutpeepl_wordpress bash

To stop the containers, press `ctrl-C` while inside the `docker-compose up` command. If you ran docker in detatched mode instead (`docker-compose up -d`) then you can stop the containers with:

    docker-compose down

To revert all changes made inside the containers, and reset them to their initial state, you can run:

    docker-compose down -v

To completely remove all of the containers from your machine, you can run:

    docker-compose rm -v

### Importing realistic data into your local copy of itsaboutpeepl.com

Log into <https://itsaboutpeepl.com/wp-admin>, and export a copy of the site data as an XML file, via “Tools” > “Export” > “Download Export File of All content”.

Put the downloaded XML file into the `docker/shared` directory, to make it available to the Docker container.

Log into <http://localhost:8081/wp-admin>, and import the XML file, via “Tools” > “Import”. You may want to opt to “Download file attachments”, if you want a local copy of all media/images.
