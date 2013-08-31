#!/bin/bash

./compressor.sh

echo ""
echo ""
echo "=========================================="
echo "== Starting Jekyll"
echo "=========================================="

jekyll serve --watch --baseurl ''