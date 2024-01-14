import re
from collections import defaultdict
import matplotlib.pyplot as plt
from datetime import datetime

access_log_path = '/var/log/apache2/access_log'
error_log_path = '/var/log/apache2/error_log'

access_log_pattern = re.compile(r'(\d+\.\d+\.\d+\.\d+) - - \[([^\]]+)\] "(GET|POST) ([^"]+)" \d+ \d+ "-" "(.*?)"')
error_log_pattern = re.compile(r'\[([^\]]+)\] \[.*?\] \[client ([^\]]+)\] (\S+): (.*)')

page_accesses = defaultdict(list)
error_logs = []

def parse_access_log(line):
    match = access_log_pattern.match(line)
    if match:
        ip_address, timestamp, method, page, user_agent_string = match.groups()
        page_accesses[page].append({'ip': ip_address, 'timestamp': timestamp, 'method': method, 'user_agent': user_agent_string})

def parse_error_log(line):
    match = error_log_pattern.match(line)
    if match:
        timestamp, client_ip, error_code, message = match.groups()
        error_logs.append({
            'timestamp': timestamp,
            'client_ip': client_ip,
            'error_code': error_code,
            'message': message
        })

with open(access_log_path, 'r') as access_log_file:
    for line in access_log_file:
        if "fdemirel" in line:
            parse_access_log(line)

with open(error_log_path, 'r') as error_log_file:
    for line in error_log_file:
        if "fdemirel" in line:
            parse_error_log(line)


for page, accesses in page_accesses.items():
    print(f"Page: {page}")
    print(f"Total accesses: {len(accesses)}")
    print("Access details:")
    for access in accesses:
        print(f"  - IP: {access['ip']}, Timestamp: {access['timestamp']}, Method: {access['method']}, User Agent: {access['user_agent']}")
    print("\n")

print("Error Details:")
for error in error_logs:
    print(f"IP: {error['client_ip']}, Timestamp: {error['timestamp']}, Error: {error['error_code']}, Message: {error['message']}")

access_times = [datetime.strptime(log['timestamp'], '%d/%b/%Y:%H:%M:%S %z') for access_list in page_accesses.values() for log in access_list]
error_times = [datetime.strptime(log['timestamp'], '%a %b %d %H:%M:%S.%f %Y') for log in error_logs]

# Create subplots
fig, (ax1, ax2) = plt.subplots(2, 1, sharex=True, figsize=(20, 16))
plt.subplots_adjust(hspace=10)

# Scatter plot for access pages
ax1.scatter(access_times, [page for page in page_accesses.keys() for _ in page_accesses[page]], label='Access', color='blue')
ax1.set_xlabel('Time')
ax1.set_ylabel('Pages (Access)')
ax1.set_title('Access Log Timeline')
ax1.legend()

# Scatter plot for errors
ax2.scatter(error_times, [error['error_code'] for error in error_logs], label='Error', color='red')
ax2.set_xlabel('Time')
ax2.set_ylabel('Error Events (Error)')
ax2.set_title('Error Log Timeline')
ax2.legend()

plt.tight_layout()
plt.savefig('CombinedDiagram.png')
plt.show()
