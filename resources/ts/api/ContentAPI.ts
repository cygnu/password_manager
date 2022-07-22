import axios from 'axios'
import { Content } from '../types/Content'

const getContents = async () => {
  const { data } = await axios.get('api/contents')
  return data
}

const createContent = async (content_name: string) => {
  const { data } = await axios.post<Content>('api/contents', {
    content_name: content_name
  })
  return data
}

export { getContents, createContent }
