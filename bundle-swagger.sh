#!/bin/bash

# Directory to clone the repository
SWAGGER_DIR=".swagger/api-ref"

# Directory to output the bundled file
OUTPUT_DIR=".swagger/api/"

# Entry point provided as an argument
ENTRYPOINT="$1"

# Create the directories if they don't exist
mkdir -p $SWAGGER_DIR $OUTPUT_DIR

# Clone the repository if it's not already there
if [ ! -d "$SWAGGER_DIR/.git" ]; then
  git clone https://github.com/basiqio/api-ref.git $SWAGGER_DIR
fi

# Run the swagger-cli command with the provided entry point
swagger-cli bundle -r "$SWAGGER_DIR/$ENTRYPOINT" -o "$OUTPUT_DIR/$ENTRYPOINT"

