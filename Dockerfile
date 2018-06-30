FROM tatemz/wp-cli

RUN apt-get update \
  && apt-get install -y git