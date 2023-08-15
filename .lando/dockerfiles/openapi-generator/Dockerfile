FROM php:8.1

# Install Java
RUN apt-get update && \
    apt-get install -y default-jdk && \
    rm -rf /var/lib/apt/lists/*

# Install OpenAPI Generator CLI
RUN curl -o /usr/local/bin/openapi-generator-cli.jar https://repo1.maven.org/maven2/org/openapitools/openapi-generator-cli/6.6.0/openapi-generator-cli-6.6.0.jar

# Create a script to run the CLI
RUN echo '#!/bin/sh\njava -jar /usr/local/bin/openapi-generator-cli.jar "$@"' > /usr/local/bin/openapi-generator && \
    chmod +x /usr/local/bin/openapi-generator
