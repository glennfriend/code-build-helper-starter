import { LogglyClient } from '../src';

describe('LogglyLogger', () => {
  const token = 'test';
  let logger;

  beforeEach(() => {
    logger = new LogglyClient(token);
  });

  // describe('debug()', () => {
  // });

  it('LogglyLogger flow', () => {
    // ....
  });
});
