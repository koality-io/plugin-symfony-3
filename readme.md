# koality.io Server Health Bundle

## Todos

- Use config.yml file for configuration
- Install docs
- Checks
  - CPU usage
  - Load
  - MySQL running
  - Symfony
    - Cache dir writable

## Configuration
```yaml
koalityio_symfony3:
    api_key: 123456789
    checks:
        free_space: 80
        cpu_usage: 4
        load: 4
        mysql_running: true
```
